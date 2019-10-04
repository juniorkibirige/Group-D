#!/usr/bin/python3.7
# enable debugging
class Node:
    def __init__(self, data):
        self.data = data
        self.next = None
        self.prev = None

class Stack:
    def __init__(self):
        self.head = None

    def push(self, data):
        if self.head is None:
            self.head = Node(data)
        else:
            new_node = Node(data)
            self.head.prev = new_node
            new_node.next = self.head
            new_node.prev = None
            self.head = new_node

    def pop(self):
        if self.head is None:
            return "List is empty!"
        else:
            temp = self.head.data
            self.head = self.head.next
            self.head.prev = None
            return temp, 'popped from stack'
    
    def top(self):
        return self.head.data, 'is the top element'
    
    def isEmpty(self):
        if self.head is None:
            return True
        else:
            return False

    def printstack(self):
        print("Stack elements are:")
        temp = self.head
        while temp is not None:
            print(temp.data, end ="->")
            temp = temp.next
            if(temp is None):
                print("None")
    
    def insertAfter(self, prev_node, data):
        p_n = None
        temp = self.head
        while temp is not None:
            if temp.data is prev_node:
                p_n = temp
            temp = temp.next
        if p_n is None:
            return print("Previous node", prev_node,"doesn't exist")
        new_node = Node(data)
        new_node.next = p_n.next
        p_n.next = new_node
        new_node.prev = p_n
        if new_node.next is not None:
            new_node.next.prev = new_node

    def insertBefore(self, next_node, data):
        temp = self.head
        n_n = None
        while temp is not None:
            if temp.data is next_node:
                n_n = temp
            temp = temp.next
        if n_n is None:
            return print("Next node", next_node, "doesn't exist!")
        new_node = Node(data)
        new_node.prev = n_n.prev
        n_n.prev = new_node
        new_node.next = n_n
        if new_node.prev is not None:
            new_node.prev.next = new_node
        else:
            self.head = new_node

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
stack.insertAfter(7, 9)
stack.insertBefore(5, 3)
stack.insertAtEnd(1)
# stack.printstack()
print('<code class="code">', stack.pop(), '<br/>','</code>')
# print("Stack empty:", stack.isEmpty())