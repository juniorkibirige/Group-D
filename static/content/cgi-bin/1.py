#!/usr/bin/python3.7
# enable debugging
import sys
import random
# Append an element to a list
myList = [ ]
vals = len(sys.argv)
c = 0
if(vals != 1):
    for (i,val) in enumerate(sys.argv):
        if i == 0:
            pass
            continue
        elif str(val) == 'random':
            num = int(sys.argv[-1])
            while c < num:
                myList.append(random.randint(0, 100))
                c += 1
            pass
            break
        elif str(val) == 'userdata':
            i += 1
            num = int(sys.argv[i])
            i += 1
            while c < num:
                try:
                    myList.append(int(sys.argv[i]))
                except ValueError:
                    print(sys.argv[i], ' not an interger')
                    i += 1
                    continue
                except IndexError:
                    break
                i += 1
            pass
            break
        else:
            myList.append(val)
else:
    myList.append(666)
print('<code class="code">', myList ,'</code>')