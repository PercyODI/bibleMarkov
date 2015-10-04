#!/usr/bin/env python

# import PyMarkovChain
from pymarkovchain import MarkovChain

mc = MarkovChain("./markov")

for i in range(1, 21):
    markovStr = mc.generateString()
    while len(markovStr) < 50 or len(markovStr) > 100:
        markovStr = mc.generateString()
    # print "[" + str(i) + "] " + markovStr
    print markovStr