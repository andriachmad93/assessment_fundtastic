package main

import (
	"bufio"
	"fmt"
	"os"
	"sorting/config"
)

func main() {
	// Open the file.
	f, _ := os.Open("number.txt")
	// Create a new Scanner for the file.
	scanner := bufio.NewScanner(f)
	// Loop over all lines in the file and print them.
	for scanner.Scan() {
		line := scanner.Text()
		fmt.Println(line)
	}

	var numbers []int = []int{5, 4, 2, 3, 1, 0}
	fmt.Println(numbers)

	config.BubbleSort(numbers)
	fmt.Println("Sorted:", numbers)
}
