FROM node:14.16.0-alpine
WORKDIR /usr/app
ENV PATH /app/node_modules/.bin:$PATH
COPY package.json package.json
COPY package-lock.json package-lock.json
RUN npm install --silent
RUN npm install react-scripts@4.0.3 -g --silent
COPY . .
CMD ["npm", "start"]