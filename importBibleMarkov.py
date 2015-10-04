#!/usr/bin/env python

from pymarkovchain import MarkovChain

mc = MarkovChain("./markov")

# f = open('bible.txt', 'r')
with open('bible.txt') as f:
    bibleStr = f.read()
    
print "[+] Bible Imported"

mc.generateDatabase(bibleStr)

print mc.generateString()