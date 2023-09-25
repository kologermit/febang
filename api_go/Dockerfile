FROM golang:1.19.0

WORKDIR /code/

RUN go mod init febang/api_go

RUN go mod tidy

CMD ["go", "run", "cmd/main.go", "-b", "0.0.0.0"]