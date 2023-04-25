FROM node:18.14.2-alpine

WORKDIR var/www/front

COPY /package*.json ./

EXPOSE 3000

RUN chmod 777 -R ./
RUN npm cache clean --force

RUN npm install -g npm@latest
RUN npm update
RUN rm -rf node_modules/sharp
RUN npm install --arch=x64 --platform=linux --target=16x sharp

RUN npm install

#COPY . ./front

CMD ["npm", "run", "start"]