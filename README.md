# React app using php, mysql, rest-api with docker compose
> react app created with react cli (npx create-react-app frontend-app)
> run npm install
> copy everything to the docker container
> application is updating on the fly

## Clone the appplication
git clone https://github.com/connect2devendra/auto-complete.git

## Build the container
docker-compose up -d
or
docker-compose up --build

## Run in browser (FRONTEND-APP)
http://localhost:5000/

## Run in browser (BACKEND-API)
http://localhost:8000/

## Run ipconfig to get system IP to change in backend-api/config/dbconn.php $host variable (BACKEND-API)
$host='172.25.80.1'; 

### Links
* [Docker Compose CLI](https://docs.docker.com/compose/gettingstarted/)
*  [ReactJs](https://reactjs.org/docs/getting-started.html)


---
This project was bootstrapped with [Create React App](https://github.com/facebook/create-react-app).

## Available Scripts

In the project directory, you can run:

### `npm start`

Runs the app in the development mode.<br>
Open [http://localhost:5000](http://localhost:5000) to view it in the browser.
