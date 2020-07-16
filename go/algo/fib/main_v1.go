package main

import (
	"fmt"
)

func fib(num int) int {

	if num == 2 || num == 1 {
		return 1
	}
	return fib(num-1) + fib(num-2)
}

func main() {
	fmt.Println(fib(20))

}
