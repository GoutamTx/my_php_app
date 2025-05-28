pipeline {
    agent any

    environment {
        DOCKER_REGISTRY = 'ayushkr08'
        APP_IMAGE = 'my_php_app'
        IMAGE_TAG = "${env.BUILD_ID}"  # Better versioning
        GIT_REPO_URL = 'https://github.com/Ayushkr093/my_php_app.git'
        GIT_BRANCH = 'main'
        COMPOSE_FILE = 'docker-compose.yml'  # Explicit compose file
    }

    stages {
        stage('Clean Workspace') {
            steps {
                cleanWs()
            }
        }

        stage('Checkout Code') {
            steps {
                git branch: "${GIT_BRANCH}", 
                     url: "${GIT_REPO_URL}"
            }
        }

        stage('Docker Login') {
            steps {
                withCredentials([usernamePassword(
                    credentialsId: 'DOCKER_CREDENTIALS', 
                    usernameVariable: 'DOCKER_USER', 
                    passwordVariable: 'DOCKER_PASS'
                )]) {
                    sh "echo ${DOCKER_PASS} | docker login -u ${DOCKER_USER} --password-stdin"
                }
            }
        }

        stage('Build & Push') {
            steps {
                script {
                    docker.build("${DOCKER_REGISTRY}/${APP_IMAGE}:${IMAGE_TAG}")
                    docker.withRegistry('', 'DOCKER_CREDENTIALS') {
                        docker.image("${DOCKER_REGISTRY}/${APP_IMAGE}:${IMAGE_TAG}").push()
                    }
                }
            }
        }

        stage('Deploy') {
            steps {
                sh """
                    docker-compose -f ${COMPOSE_FILE} down -v
                    docker-compose -f ${COMPOSE_FILE} up -d --build
                """
            }
        }
    }

    post {
        always {
            sh 'docker system prune -f --volumes || true'
            cleanWs()
        }
        success {
            slackSend message: "Deployment successful: ${env.BUILD_URL}"
        }
        failure {
            slackSend message: "Deployment failed: ${env.BUILD_URL}"
        }
    }
}
