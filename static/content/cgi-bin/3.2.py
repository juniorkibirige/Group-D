import sys
import random


class Node:
    def __init__(self, data):
        self.data = data
        self.next = None


class Stack:
    def __init__(self):
        self.head = None
    
    def push(self, data):
        new_node = Node(data)
        if self.head is None:
            self.head = Node(data)
        else:
            new_node = Node(data)
            new_node.next = self.head
            self.head = new_node
    
    def showStack(self):
        cur = self.head
        while cur is not None:
            print(cur.data,end="->")
            cur = cur.next
            if(cur is None):
                print("None")
                break
    
    def insertBefore(self, n, data):
        temp = self.head
        n_n = None
        prev = None
        while temp is not None:
            if temp.data is n:
                n_n = temp
                break
            else:
                prev = temp
            temp = temp.next
        if n_n is None:
            print("Next node", n, "doesn't exist!")
        else:
            new_node = Node(data)
            if prev is not None:
                prev.next = new_node
                new_node.next = n_n
            else:
                new_node.next = self.head
                self.head = new_node
    
    def insertAfter(self, p, data):
        temp = self.head
        n_n = None
        while temp is not None:
            if temp.data is p:
                n_n = temp
            temp = temp.next
        if n_n is None:
            print("Previous node", p, "doesn't exist!")
        else:
            new_node = Node(data)
            new_node.next = n_n.next
            n_n.next = new_node
    
    def insertAtEnd(self, data):
        end = self.head
        while end is not None:
            if end.next is not None:
                end = end.next
            else:
                break
        new_node = Node(data)
        end.next = new_node

    def deleteBefore(self, b):
        temp = self.head
        n_n = None
        prev = None
        prev1 = None
        while temp is not None:
            if temp.data is b:
                n_n = temp
                break
            else:
                prev1 = prev
                prev = temp
            temp = temp.next
        if n_n is None:
            print("Next node", b, "doesn't exist!")
        else:
            prev1.next = prev.next
            prev = None

    def deleteAfter(self, a):
        temp = self.head
        n_n = None
        while temp is not None:
            if temp.data is a:
                n_n = temp
            temp = temp.next
        if n_n is None:
            print("Previous node", a, "doesn't exist!")
        n_n.next = n_n.next.next

    def deleteAtEnd(self):
        end = self.head
        prev = None
        while end is not None:
            if end.next is not None:
                prev = end
                end = end.next
            else:
                break
        end = None
        prev.next = None

    
stack = Stack()
stack.push('5')
stack.push('6')
stack.push('3')
stack.push('10')
stack.showStack()
stack.insertBefore('5', '20')
stack.insertAfter('20','15')
stack.insertAtEnd('90')
stack.showStack()
stack.deleteBefore('90')
stack.deleteAtEnd()
stack.deleteAfter('10')
stack.showStack()
print((3/(2*4))+(3/8)+3)