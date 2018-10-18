package config

import (
	"fmt"
	"io/ioutil"
)

func ReadFile() {
	data, err := ioutil.ReadFile("number.txt")
	if err != nil {
		return
	}
	fmt.Println(string(data))
}

func BubbleSort(input [10]int) {
	// n is the number of items in our list
	n := 10
	swapped := true
	for swapped {
		swapped = false
		for i := 1; i < n-1; i++ {
			if input[i-1] > input[i] {
				fmt.Println("Swapping")
				// swap values using Go's tuple assignment
				input[i], input[i-1] = input[i-1], input[i]
				swapped = true
			}
		}
	}
	fmt.Println(input)
}
