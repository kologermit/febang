FROM node:latest

WORKDIR /code

RUN yarn install --frozen-lockfile

EXPOSE 3000

CMD if [ -e ./build/robots.txt ]; then echo "Build already created"; else npm run build; fi