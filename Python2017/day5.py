lineNo = 0
steps = 0
a = open('day5input.txt','r')
go = True
b=[]
i=0
for line in a:
	c = line.strip('\n')
	c = c.strip('\t')
	b.insert(i,int(c))
	i += 1

while(go):
	if(lineNo >= len(b)):
		go = False
		break

	if(b[lineNo] >= 3):
		b[lineNo] -= 1
		lineNo += b[lineNo]+1
	else:
		b[lineNo] += 1
		lineNo += b[lineNo]-1

	steps += 1


print(steps)