a = 325489
b = []
d = {}
c = 1
x = 0
y = 0
go = True
p2 = False
i = 0

def calc(d,x,y):
	if(x == 0 and y == 0):
		return 1

	value = 0

	#right
	check = str(x+1)+","+str(y)
	if(check in d):
		value += d[check]

	#top right
	check = str(x+1)+","+str(y+1)
	if(check in d):
		value += d[check]
		
	#top
	check = str(x)+","+str(y+1)
	if(check in d):
		value += d[check]
		
	#top left
	check = str(x-1)+","+str(y+1)
	if(check in d):
		value += d[check]
		
	#left
	check = str(x-1)+","+str(y)
	if(check in d):
		value += d[check]
		
	#bottom left
	check = str(x-1)+","+str(y-1)
	if(check in d):
		value += d[check]
		
	#bottom
	check = str(x)+","+str(y-1)
	if(check in d):
		value += d[check]
		
	#bottom right
	check = str(x+1)+","+str(y-1)
	if(check in d):
		value += d[check]
		
	return value

while(go):

	# right
	for j in range(c):
		i += 1
		b.insert(i, [x,y])
		d[str(x)+","+str(y)] = calc(d,x,y)
		if(calc(d,x,y) > a and p2 == False):
			print(str(calc(d,x,y)))
			p2 = True
		x += 1

	# up
	for j in range(c):
		i += 1
		b.insert(i, [x,y])
		d[str(x)+","+str(y)] = calc(d,x,y)
		if(calc(d,x,y) > a and p2 == False):
			print(str(calc(d,x,y)))
			p2 = True
		y += 1

	c += 1

	# left
	for j in range(c):
		i += 1
		b.insert(i, [x,y])
		d[str(x)+","+str(y)] = calc(d,x,y)
		if(calc(d,x,y) > a and p2 == False):
			print(str(calc(d,x,y)))
			p2 = True
		x -= 1

	# down
	for j in range(c):
		i += 1
		b.insert(i, [x,y])
		d[str(x)+","+str(y)] = calc(d,x,y)
		if(calc(d,x,y) > a and p2 == False):
			print(str(calc(d,x,y)))
			p2 = True
		y -= 1

	c += 1

	if(i >= a):
		go = False

steps = abs(b[a-1][0]) + abs(b[a-1][1])

print(str(steps))
