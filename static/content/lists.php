<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_GET['t'];?></title>
    <link rel="stylesheet" href="/static/css/style.css">
</head>

<body onload="loader()">
    <div class="wel-text">
        <div class="wel" id="wel">
            <div class="logos">
                <img class="mak" src="/static/icons/mak_logo.png" alt="Makerere Logo">
            </div>
            <div class="titles">
                MAKERERE UNIVERSITY<br>COLLEGE OF COMPUTING AND INFORMATION
                <br>SCIENCES<br>DEPARTMENT OF COMPUER SCIENCE &<br>
                DEPARTMENT OF SOFTWARE ENGINEERING<br>
                CSC 2100 Data Structures and Algorithms
            </div>
        </div>
        <hr style="margin-top: 5px;margin-bottom:0px">
        <div id="body">
            <div class="intro" style="text-align: left!important;padding: 10px;color: floralwhite;">
                Information about linked lists(singly linked and doubly linked)
            </div>
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

stack = Stack()
stack.push(4)
stack.push(5)
stack.push(6)
stack.push(7)
stack.insertAfter(7, 9)
stack.insertBefore(5, 3)
stack.printstack()
print("Stack empty:", stack.isEmpty())
    </div></code></div></pre>
    <div style="text-align:left; padding: 10px;">The output of the above code.</div>
<pre class="lang-py prettyprint prettyprinted"><div class="output"><code class="code_disp" id="disp">Compiling Code ...</code><code class="code_norm" id="norm" style="display:none"><?php $command='python3.7 cgi-bin/1.py';$python=`$command`;echo$command;?></code></div></pre>
        </div>
            <script src="/static/js/jquery-3.4.1.min.js"></script>
            <script src="/static/js/main.js"></script>
    </div>
</body>

</html>