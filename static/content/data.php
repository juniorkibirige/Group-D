<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
} else echo 'Site has not been called by a script!';
?>
<div id="body">
    <div class="intro" style="text-align: left!important;padding: 10px;color: floralwhite;">
        <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if ($_GET['dat'] == 1) { ?>
                <script>$('.intro').load('/static/content/files/<?php echo $_GET['dat'];?>.php');</script>
            <?php } else if ($_GET['dat'] == 3) {?>
                <h3 style="text-align:center"><?php echo $_GET['t']; ?>: Lists,<br> Stacks and Queues, Priority Queues</h3>
                <p>Stack is a linear data structure which follows a particular order in which the operations are performed. The order may be LIFO(Last In First Out) or FILO(First In Last Out).</p>
                <p>Mainly the following three basic operations are performed in the stack:
                    <ul style="list-style:disc">
                        <li><b>Pop</b>:Removes an item from the stack. The items are popped in the reversed order in which they are pushed. If the stack is empty, then it is said to be an Underflow condition.</li>
                        <li><b>isEmpty</b>: Returns true if stack is empty, else false.</li>
                        <li><b>Push</b>: Adds an item in the stack. If the stack is full, then it is said to be an Overflow condition.</li>
                        <li><b>Peek or Top</b>: Returns top element of stack.</li>
                    </ul>
                </p>
                <img src="/static/content/images/stack.png" alt="Description of a stack" width="100%">
                <p>There are many real-life examples of a stack. Consider the simple example of plates stacked over one another in a canteen. The plate which is at the top is the first one to be removed, i.e. the plate which has been placed at the bottommost position remains in the stack for the longest period of time. So, it can be simply seen to follow LIFO/FILO order.</p>
                <p><b>Time Complexities of operations on stack</b>:<br>&nbsp;&nbsp;&nbsp;&nbsp;push(), pop(), isEmpty() and peek() all take O(1) time. We do not run any loop in any of these operations.</p>
            <?php
            }else { ?>
                The provided content in the URL is corrupt.
        <?php
            }
        }?>
    </div>
<?php if ($_SERVER['REQUEST_METHOD'] == 'GET'){if($_GET['dat']==1){?>
    <pre class="lang-py prettyprint prettyprinted"><div class="source"><code><div class="code" style="text-align:left!important;padding-left:-20px;">
    # Append to list
        myList = [ ]
        myList.append(666)
        print(myList)";
    </div></code></div></pre>
    <div style="text-align:left; padding: 10px;">The output of the above code.</div>
<pre class="lang-py prettyprint prettyprinted"><div class="output"><code class="code_disp" id="disp">Compiling Code ...</code><code class="code_norm" id="norm" style="display:none"><?php $command='python3.7 cgi-bin/'.$_GET['dat'].'.py ';$python=`$command`;echo$python;?></code></div></pre>
<div class="user">Try it out yourself:
    <select name="usr-input">
    <option value="sel" selected>Select input</option>
    <?php
        if($_GET['dat'] == 1){?>
        <option value="rand_array" onclick="user_data('random')">Create Random Array</option>
        <option value="user_array" onclick="user_data('user_def')">Create User defined Array</option>
        <option value="s_num_array" onclick="user_data('num_elem')">Create Array with Specified Elements</option>
        <?php } else { ?>
            <option value="null" onclick="user_data('null')">Incorrect parameters</option>
        <?php }
    ?>
    </select>
    <div class="user_random" style="display:none">
        <form action="" method="get">
            <input type="text" name="type" value="random" hidden><br>
            <input type="text" name="data" value="O(1)" hidden>
            <input type="text" name="dat" value="<?php echo $_GET['dat'];?>" hidden>
            <input type="text" name="t" value="<?php echo $_GET['t'];?>" hidden>
            <input type="submit" value="Random Array">
        </form>
    </div>
    <div class="user_def" style="display:none">
        <form action="" method="get">
            <input type="text" name="type" value="userdata" hidden>
            <input type="text" name="data" value="O(1)" hidden>
            <input type="text" name="dat" value="<?php echo $_GET['dat'];?>" hidden>
            <input type="text" name="t" value="<?php echo $_GET['t'];?>" hidden>
            <input type="text" name="num" id="num" value="5" readonly hidden>
            <input type="text" name="values" id="values" onkeydown="get_num()"><br>
            <span class="err" style="display:none;color:crimson">A value in the array is not a number.</span>
            <input type="submit" value="Create User Array">
        </form>
    </div>
    <div class="user_elem" style="display:none">
        <form action="" method="get">
            <input type="text" name="type" value="userelems" hidden>
            <input type="text" name="data" value="O(1)" hidden>
            <input type="text" name="dat" value="<?php echo $_GET['dat'];?>" hidden>
            <input type="text" name="t" value="<?php echo $_GET['t'];?>" hidden><br>
            <input type="text" name="u_elem" placeholder="Number of random elements">&nbsp;&nbsp;
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
<pre class="lang-py prettyprint prettyprinted"><div class="output_user"><?php if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['type']) && $_GET['data'] == 'O(1)'){$random_code_post = $_GET['type'];if($random_code_post == 'random'){$command = 'python3.7 cgi-bin/'.$_GET['dat'].'.py ' . $random_code_post . ' 10';$python = `$command`;echo $python;} elseif($random_code_post == 'userdata'){$vars = urldecode($_GET['values']);$num = $_GET['num'];$command = 'python3.7 cgi-bin/'.$_GET['dat'].'.py ' . $random_code_post . ' ' . $num . ' ' .$vars;$python = `$command`;echo $python;} elseif($random_code_post == 'userelems'){$random_code_post = 'random';$num = $_GET['u_elem'];$command = 'python3.7 cgi-bin/'.$_GET['dat'].'.py ' . $random_code_post . ' ' . $num;$python = `$command`;echo $python;}} else {echo '<code class="code">Waiting for user input above ...</code>';}?></div></pre>
<div class="introd" style="text-align: left!important;padding: 10px;color: floralwhite;">
<pre style="background-color:cadetblue; text-align:left;color:azure; margin:10px">Time Complexity: O(log n)

Name: Logarithmic

Example operations: Finding an element in a sorted array.</pre>
</div>
<pre class="lang-py prettyprint prettyprinted"><div class="source"><code>
    <div class="code" style="text-align:left!important;padding-left:-20px;">
        # Find target 22 (i.e. return its index)in a sorted list
        # Here we use Binary Search algorithm because 
        # its time complexity is O(log n)
        def binarySearch(sortedList, target):
        left = 0
        right = len(sortedList) - 1
        while (left <= right):
        mid = (left + right)/2
        if (sortedList(mid) == target):
        return int(mid), target
        elif(sortedList(mid) < target):
        left = mid + 1
        else:
        right = mid - 1
        # If target is not in the list, return -1
        return -1
        arry = [32, 3, 5, 20, 1, 43, 95, 60, 22, 64]
        arry = sorted(arry)
        print(arry)
        start = time.time()
        ind, targ= binarySearch(arry,64)
        end = time.time()
    </div></code></div></pre>
    <div style="text-align:left; padding: 10px;">The output of the above code.</div>
<pre class="lang-py prettyprint prettyprinted"><div class="output"><code class="code_disp" id="disp">Compiling Code ...</code><code class="code_norm" id="norm" style="display:none"><?php $command='python3.7 cgi-bin/'.$_GET['dat'].'.1.py ';$python=`$command`;echo$python;?></code></div></pre>
<div class="user">Try it out yourself:
    <select name="usr-input">
    <option value="sel" selected>Select input</option>
    <?php
        if($_GET['dat'] == 1){?>
        <option value="rand_array" onclick="user_data('cust_array')">Search custom array</option>
        <!-- <option value="user_array" onclick="user_data('user_def')">Create User defined Array</option>
        <option value="s_num_array" onclick="user_data('num_elem')">Create Array with Specified Elements</option> -->
        <?php } else { ?>
            <option value="null" onclick="user_data('null')">Incorrect parameters</option>
        <?php }
    ?>
    </select>
    <div class="user_cust" style="display:none">
        <form action="" method="get">
            <input type="text" name="data" value="O(logn)" hidden>
            <input type="text" name="type" value="cust_array" hidden><br>
            <input type="text" name="dat" value="<?php echo $_GET['dat'];?>" hidden>
            <input type="text" name="t" value="<?php echo $_GET['t'];?>" hidden>
            <input type="text" name="num" id="num" value="5" readonly hidden>
            Array:<input type="text" name="arr_cust" id="values" onkeydown="get_num()"><br>
            Search for:<input type="text" name="param" id="param"><br>
            <input type="submit" value="Custom Array Search">
        </form>
</div>
<pre class="lang-py prettyprint prettyprinted"><div class="output_user"><?php if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['type']) && $_GET['data'] == 'O(logn)'){$random_code_post = $_GET['type'];if($random_code_post == 'cust_array'){$command = 'python3.7 cgi-bin/'.$_GET['dat'].'.1.py ' . $random_code_post .' '. $_GET['num'] .' '. $_GET['arr_cust'] .' '. $_GET['param'];$python = `$command`;echo $python;}} else {echo '<code class="code">Waiting for user input above ...</code>';}?></div></pre>
<?php }else if($_GET['dat'] == 3){?>
    <pre class="lang-py prettyprint prettyprinted"><div class="source"><code><div class="code" style="text-align:left!important;padding-left:-20px;">
    def createstack():
        stack = []
        return stack
    
    def isEmpty(stack):
        return len(stack) == 0
    
    # to push and add an item to the stack
    def push(stack, obj):
        stack.append(obj)
        return (obj + " pushed to stack "
    
    # to remove an item to the stack
    # mainly we usually use the array index number to point to the object to remove from the stack
    def pop(obj):
        if isEmpty(obj):
            return "Stack is empty cannot pop"  # return minus infinite
        else:
            print(obj[-1], "popped from stack")
            return obj.pop()

    def view_stack(ob):
        return ob
    
    stack = createstack()
    print(pop(stack))
    push(stack, str(10))
    push(stack, str(20))
    push(stack, str(30))
    push(stack, str(50))
    pop(stack)
    view_stack(stack)
    </div></code></div></pre>
    <div style="text-align:left; padding: 10px;">The output of the above code.</div>
<pre class="lang-py prettyprint prettyprinted"><div class="output"><code class="code_disp" id="disp">Compiling Code ...</code><code class="code_norm" id="norm" style="display:none"><?php $command='python3.7 cgi-bin/'.$_GET['dat'].'.py ';$python=`$command`;echo$python;?></code></div></pre>
<?php    }
}
?>