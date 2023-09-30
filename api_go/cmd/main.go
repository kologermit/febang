package main

import (
    "github.com/kologermit/febang"
    "log"
)

func main() {
    srv := new(febang.Server);
    if err := srv.Run("8080"); err != nil {
        log.Fatalf("Error while running server: %s", err.Error());
    }
}