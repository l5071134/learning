package main

import (
	"fmt"
)

func fib(num int) int {
	if num <= 0 {
		return 0
	}

	var memo = make(map[int]int)
	return helper(memo, num)
}

func helper(memo map[int]int, num int) int {
	if num == 2 || num == 1 {
		return 1
	}

	if _, ok := memo[num]; ok {
		return memo[num]
	}
	memo[num] = helper(memo, num-1) + helper(memo, num-2)

	return memo[num]
}

func main() {

	fmt.Println(fib(20))

}
