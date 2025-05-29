pipeline {
    agent any

    environment {
        DOCKER_REGISTRY = 'ayushkr08'
        APP_IMAGE = 'my_php_app'
        IMAGE_TAG = "${env.BUILD_ID}"
        GIT_REPO_URL = 'https://github.com/Ayushkr093/my_php_app.git'
        GIT_BRANCH = 'main'
        COMPOSE_FILE = 'docker-compose.yml'
    }

    stages {
        stage('Clean Previous Docker Resources') {
            steps {
                sh '''
                    echo "🧹 Cleaning up existing Docker containers, volumes, and networks..."
                    docker rm -f $(docker ps -aq) || true
                    docker volume rm $(docker volume ls -q) || true
                    docker network prune -f || true
                    docker system prune -af --volumes || true
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
                    credentialsId: 'DOCKER_CREDENTIALS',
                    usernameVariable: 'DOCKER_USER',
                    passwordVariable: 'DOCKER_PASS'
                )]) {
                    sh '''
                        echo "$DOCKER_PASS" | docker login -u "$DOCKER_USER" --password-stdin
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
                sh '''
                    docker-compose -f ${COMPOSE_FILE} up -d --build
                '''
            }
        }
    }

    post {
        always {
            sh 'docker system prune -f --volumes || true'
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
