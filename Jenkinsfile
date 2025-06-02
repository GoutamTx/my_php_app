pipeline {
    agent any

    environment {
        DOCKER_REGISTRY = 'ayushkr08'
        APP_IMAGE = 'my_php_app'
        IMAGE_TAG = "${env.BUILD_ID}"
        GIT_REPO_URL = 'https://github.com/GoutamTx/my_php_app.git'
        GIT_BRANCH = 'main'
        COMPOSE_FILE = 'docker-compose.yml'
    }

    stages {
        stage('Clean Previous Docker Resources') {
            steps {
                bat '''
                    echo 🧹 Cleaning up existing Docker containers, volumes, and networks...
                    for /f "tokens=*" %%i in ('docker ps -aq') do docker rm -f %%i
                    for /f "tokens=*" %%i in ('docker volume ls -q') do docker volume rm %%i
                    docker network prune -f
                    docker system prune -af --volumes
                '''
            }
        }

        stage('Clean Workspace') {
            steps {
                cleanWs()
            }
        }

        stage('Checkout Code') {
            steps {
                git branch: "${env.GIT_BRANCH}", url: "${env.GIT_REPO_URL}"
            }
        }

        stage('Docker Login') {
            steps {
                withCredentials([usernamePassword(
                    credentialsId: 'docker-hub-creds',
                    usernameVariable: 'DOCKER_USER',
                    passwordVariable: 'DOCKER_PASS'
                )]) {
                    bat '''
                        echo %DOCKER_PASS% | docker login -u %DOCKER_USER% --password-stdin
                    '''
                }
            }
        }

        stage('Build & Push') {
            steps {
                script {
                    def image = docker.build("${DOCKER_REGISTRY}/${APP_IMAGE}:${IMAGE_TAG}")
                    docker.withRegistry('', 'DOCKER_CREDENTIALS') {
                        image.push()
                    }
                }
            }
        }

        stage('Deploy') {
            steps {
                bat """
                    docker-compose -f ${COMPOSE_FILE} up -d --build
                """
            }
        }
    }

    post {
        always {
            bat 'docker system prune -f --volumes'
            cleanWs()
        }

        success {
            echo "✅ Deployment successful: ${env.BUILD_URL}"
        }

        failure {
            echo "❌ Deployment failed: ${env.BUILD_URL}"
        }
    }
}
