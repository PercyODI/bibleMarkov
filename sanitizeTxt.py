import re

# with open('bible.1.txt', 'r+') as f, open('bibleSan.txt', 'a') as san:
#     for line in f:
#         # print "- Removing " #+ re.match(r'\d+:\d+ ', line).groups
#         line = re.sub(r'\d+:\d+ ', '', line)
#         san.write(line)
#         print line

with open('bible.txt', 'r+') as f, open('bibleSan.txt', 'a') as san:
    for line in f:
        # print "- Removing " #+ re.match(r'\d+:\d+ ', line).groups
        line.replace(':', '')
        line.replace(';', '')
        line.replace('.', '')
        line.replace(',', '')
        line.replace('

