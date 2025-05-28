pipeline {
    agent any

    environment {
        DOCKER_REGISTRY = 'ayushkr08'
        APP_IMAGE = 'my_php_app'
        IMAGE_TAG = 'latest'
        GIT_REPO_URL = 'https://github.com/Ayushkr093/my_php_app.git'
        GIT_BRANCH = 'main'
    }

    stages {
        stage('Clean Docker') {
            steps {
                sh '''
                    docker rm -f $(docker ps -aq) 2>/dev/null || true
                    docker rmi -f $(docker images -aq) 2>/dev/null || true
                    docker volume prune -f || true
                    docker network prune -f || true
                '''
            }
        }

        stage('Checkout Code') {
            steps {
                deleteDir()
                sh "git clone --branch ${GIT_BRANCH} ${GIT_REPO_URL} ."
            }
        }

        stage('Docker Login') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'DOCKER_CREDENTIALS', usernameVariable: 'USER', passwordVariable: 'PASS')]) {
                    sh 'echo "$PASS" | docker login -u "$USER" --password-stdin'
                }
            }
        }

        stage('Build & Push Image') {
            steps {
                sh "docker build -t ${DOCKER_REGISTRY}/${APP_IMAGE}:${IMAGE_TAG} ."
                sh "docker push ${DOCKER_REGISTRY}/${APP_IMAGE}:${IMAGE_TAG}"
            }
        }

        stage('Deploy with Docker Compose') {
            steps {
                sh "TAG=${IMAGE_TAG} docker-compose up -d --build"
            }
        }
    }

    post {
        always {
            sh 'docker system prune -f --volumes || true'
        }
    }
}
