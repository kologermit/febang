package febang;

import (
	"net/http"
	"time"
	"context"
);

type Server struct {
	httpServer *http.Server
};

func (server *Server) Run(port string) error {
	server.httpServer = &http.Server {
		Addr: ":" + port,
		MaxHeaderBytes: 1 << 20,
		ReadTimeout: 10 * time.Second,
		WriteTimeout: 10 * time.Second,
	};

	return server.httpServer.ListenAndServe();
}

func (server *Server) Shutdown(ctx context.Context) error {
	return server.httpServer.Shutdown(ctx);
}