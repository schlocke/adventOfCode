x = open('day4input.txt', 'r')

valid1 = 0
valid2 = 0

for line in x:
	a = line.strip('\n')
	a = a.strip('\t')
	a = a.split(" ")
	
	if(len(a) == len(set(a))):
		valid1 += 1
	
	c = []
	for b in a:
		c.append(''.join(sorted(b)))

	if(len(c) == len(set(c))):
		valid2 += 1

print(str(valid1))
print(str(valid2))