#!/usr/bin/env python

# import PyMarkovChain
from pymarkovchain import MarkovChain

mc = MarkovChain("./markov")

for i in range(1, 26):
    markovStr = mc.generateString()
    while len(markovStr) < 75: # or len(markovStr) > 115:
        markovStr = mc.generateString()
    # print "[" + str(i) + "] " + markovStr
    print markovStr