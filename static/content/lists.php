<div class="intro" style="text-align: left!important;padding: 10px;color: floralwhite;">
    <nav class="lists-nav">
        <a href="#singly" onclick="toggle('singly')"><li class="singly" style="display:inline-block;background-color:black;padding:5px;border-left:1px solid grey;border-top-left-radius:10px;border-bottom-left-radius:10px">Singly Linked-List</li></a>
        <a href="#doubly" onclick="toggle('doubly')"><li class="doubly" style="display:inline-block;background-color:black;padding:5px;border-right:1px solid grey;border-top-right-radius:10px;border-bottom-right-radius:10px">Doubly Linked-List</li></a>
    </nav>
    Information about linked lists(singly linked and doubly linked)
</div>
<pre style="background-color:cadetblue; text-align:center;color:azure" id="doubly">Doubly Linked-List</pre>
<pre class="lang-py prettyprint prettyprinted"><div class="source"><code><div class="code" style="text-align:left!important;padding-left:-20px;">
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
stack.printstack()
stack.insertAfter(7, 9)
stack.insertBefore(5, 3)
stack.insertAtEnd(1)
stack.printstack()
stack.pop()
stack.printstack()
print("Stack empty:", stack.isEmpty())
    </div></code></div></pre>
    <div style="text-align:left; padding: 10px;">The output of the above code.</div>
<pre class="lang-py prettyprint prettyprinted"><div class="output"><code class="code_disp" id="disp">Compiling Code ...</code><code class="code_norm" id="norm" style="display:none"><?php $command='python3.7 cgi-bin/3.1.py';$python=`$command`;echo$python;?></code></div></pre>
<pre style="background-color:cadetblue; text-align:center;color:azure" id="singly">Singly Linked-List</pre>
    <pre class="lang-py prettyprint prettyprinted"><div class="source"><code><div class="code" style="text-align:left!important;padding-left:-20px;">
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
    </div></code></div></pre>
    <div style="text-align:left; padding: 10px;">The output of the above code.</div>
<pre class="lang-py prettyprint prettyprinted"><div class="output"><code class="code_disp" id="disp">Compiling Code ...</code><code class="code_norm" id="norm" style="display:none"><?php $command='python3.7 cgi-bin/3.2.py';$python=`$command`;echo$python;?></code></div></pre>
            <script src="/static/js/jquery-3.4.1.min.js"></script>
            <script src="/static/js/main.js"></script>
            <script>
                toggle = (elem) => {
                    
                    $('.'+elem).css({
                        'background-color': 'grey',
                        'color': 'aqua',
                        border: '1px solid lime'
                    })
                }
            </script>