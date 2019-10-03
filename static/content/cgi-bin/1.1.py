import time, sys
# Find target 22 (i.e. return its index)in a sorted list
# Here we use Binary Search algorithm because its time complexity is O(log n)
def binarySearch(sortedList, target):
 left = 0
 right = len(sortedList) - 1
 while (left <= right):
  mid = (left + right)/2
  if (sortedList[int(mid)] == target):
   return int(mid), target
  elif(sortedList[int(mid)] < target):
   left = mid + 1
  else:
   right = mid - 1
# If target is not in the list, return -1
 return -1
vals = len(sys.argv)
c = 0
if(vals != 1):
    for (i,val) in enumerate(sys.argv):
        if i == 0:
            pass
            continue
        elif str(val) == 'cust_array':
            myList = []
            i += 1
            num = int(sys.argv[i])
            i += 1
            while c < num:
                try:
                    myList.append(int(sys.argv[i]))
                except ValueError:
                    c += 1
                    i += 1
                    continue
                except IndexError:
                    break
                c += 1
                i += 1
            c = i
            arry = sorted(myList)
            start = time.time()
            ind, targ = binarySearch(arry,int(sys.argv[c]))
            end = time.time()
            print('Your array:', myList)
else:
    arry = [32, 3, 5, 20, 1, 43, 95, 60, 22, 64]
    arry = sorted(arry)
    start = time.time()
    ind, targ = binarySearch(arry,64)
    end = time.time()
print('<code class="code" style="text-align:center!important;">Sorted:',arry,'</p>','The index of',targ,'is',ind,'found in', (end-start),'ms.</code>')
# return 3