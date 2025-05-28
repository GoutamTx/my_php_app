pipeline {
    agent any

    environment {
        DOCKER_REGISTRY = 'ayushkr08'
        APP_IMAGE = 'my_php_app'
        GIT_BRANCH = 'main'
        GIT_REPO_URL = 'https://github.com/Ayushkr093/my_php_app.git'
    }

    stages {
        stage('Checkout') {
            steps {
                echo 'Cloning public repository...'
                sh "git clone --branch ${GIT_BRANCH} ${GIT_REPO_URL} ."
                script {
                    env.COMMIT_HASH = sh(script: "git rev-parse --short HEAD", returnStdout: true).trim()
                    echo "Checked out commit: ${env.COMMIT_HASH}"
                }
            }
        }

        stage('Docker Login') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'DOCKER_CREDENTIALS', usernameVariable: 'DOCKER_USERNAME', passwordVariable: 'DOCKER_PASSWORD')]) {
                    sh 'echo "$DOCKER_PASSWORD" | docker login -u "$DOCKER_USERNAME" --password-stdin'
                }
            }
        }

        stage('Build & Push Docker Image') {
            steps {
                script {
                    def imageTag = "${DOCKER_REGISTRY}/${APP_IMAGE}:${env.COMMIT_HASH}"
                    echo "Building and pushing image: ${imageTag}"
                    docker.build(imageTag, ".")
                    docker.image(imageTag).push()
                }
            }
        }

        stage('Run with Docker Compose') {
            steps {
                sh 'docker-compose down --volumes --remove-orphans'
                sh "TAG=${env.COMMIT_HASH} docker-compose up -d --build"
            }
        }
    }

    post {
        always {
            echo 'Cleaning up unused Docker resources...'
            sh 'docker system prune -f --volumes || true'
        }
    }
}
