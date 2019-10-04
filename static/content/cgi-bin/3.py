def createstack():
    stack = []
    return stack


def isEmpty(stack):
    return len(stack) == 0


# to push and add an item to the stack

def push(stack, obj):
    stack.append(obj)
    return obj + " pushed to stack "


# to remove an item to the stack
# mainly we usually use the array index number to point to the object to remove from the stack

def pop(obj):
    if isEmpty(obj):
        return "Stack is empty cannot pop"  # return minus infinite
    else:
        return obj.pop(), "popped from stack"

def view_stack(ob):
    return ob

stack = createstack()
print('<code class="code">', pop(stack),'</p>', push(stack, str(10)),'</p>',  push(stack, str(20)),'</p>', push(stack, str(30)),'</p>',\
push(stack, str(50)),'</p>', pop(stack), '</p>', view_stack(stack), '</code>')
