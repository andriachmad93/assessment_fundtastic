package main

import (
	"sorting/config"
)

var toBeSorted [10]int = [10]int{25, 20, 17, 60, 100, 4, 10}

func main() {
	config.BubbleSort(toBeSorted)
}
