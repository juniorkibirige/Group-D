#!/usr/bin/python3.7
# enable debugging
import sys
import random

# Holds a nodes content i.e. the current element, a pointer to the next element
# and a pointer to the previous element
class Node:
    def __init__(self, data):
        self.data = data
        self.next = None
        self.prev = None

# Implementation of a doubly linked-list using a Stack
class Stack:
    # Initializes the stack with head as None
    def __init__(self):
        self.head = None
    
    # Is used to add data to the top of the stack
    def push(self, data):
        if self.head is None:
            self.head = Node(data)
        else:
            new_node = Node(data)
            self.head.prev = new_node
            new_node.next = self.head
            new_node.prev = None
            self.head = new_node
    
    # Is used to remove an element from the top of the stack
    def pop(self):
        if self.head is None:
            print("List is empty!")
        else:
            temp = self.head.data
            self.head = self.head.next
            self.head.prev = None
            print('<br>',temp, 'popped from stack')
    
    # Is used to print the contents of the stack
    def printstack(self):
        print("<br>Stack elements are:")
        temp = self.head
        while temp is not None:
            print(temp.data,end="->")
            temp = temp.next
            if(temp is None):
                print("None")
    
    # Is used to insert an element after a given element X.
    def insertAfter(self, prev_node, data):
        p_n = None
        temp = self.head
        while temp is not None:
            if temp.data is prev_node:
                p_n = temp
            temp = temp.next
        if p_n is None:
            print("Previous node", prev_node,"doesn't exist")
        new_node = Node(data)
        new_node.next = p_n.next
        p_n.next = new_node
        new_node.prev = p_n
        if new_node.next is not None:
            new_node.next.prev = new_node
    
    # Is used to insert an element before a given element X
    def insertBefore(self, next_node, data):
        temp = self.head
        n_n = None
        while temp is not None:
            if temp.data is next_node:
                n_n = temp
            temp = temp.next
        if n_n is None:
            print("Next node", next_node, "doesn't exist!")
        new_node = Node(data)
        new_node.prev = n_n.prev
        n_n.prev = new_node
        new_node.next = n_n
        if new_node.prev is not None:
            new_node.prev.next = new_node
        else:
            self.head = new_node

    # Is used to insert an element at the end of the Stack
    def insertAtEnd(self, data):
        end = self.head
        while end is not None:
            if end.next is not None:
                end = end.next
            else:
                break
        new_node = Node(data)
        new_node.prev = end
        end.next = new_node
        
stack = Stack()
stack.push(4)
stack.push(5)
stack.push(6)
stack.push(7)
stack.printstack()
stack.insertAfter(7, 9)
stack.insertBefore(5, 3)
stack.insertAtEnd(1)
stack.printstack()
stack.pop()
stack.printstack()
print('<br>Stack empty:', stack.isEmpty())
# print('<code class="code"><br/>Stack empty:', stack.isEmpty(),'</br>', stack.printstack(),'<br/>', stack.pop(), '</code>')