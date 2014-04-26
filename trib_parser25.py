# -*- coding: utf-8 -*-
"""
Created on Thu Apr 24 14:22:47 2014

@author: Kyle Grage
"""

from tribparser import parse_case

def parse_tribunal(error_file):
    """
    Parses all tribunal cases
    """
    #initialize error file
    e_file = open(error_file, 'w')
    e_file.write("ERRORS:\n")
    e_file.close()
    
    base_url = "http://na.leagueoflegends.com/tribunal/en/case/"
    post_url = "/#nogo"
    
    #range from 5555631 to 6787078
    for case in range(6750000, 6787079):
        final_url = base_url + str(case) + post_url
        parse_case(final_url, case, error_file)

#Main method
if __name__ == "__main__":
    parse_tribunal('Resources/ErrorURL.txt')
