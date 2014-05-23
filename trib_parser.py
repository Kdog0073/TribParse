# -*- coding: utf-8 -*-
"""
Created on Thu Apr 24 14:22:47 2014

@author: Kyle Grage
"""

from selenium import webdriver
import random

MIN_CASE_NUMBER = 5555631
MAX_CASE_NUMBER = 6790508
UPDATED_DATE = "05/21/2014"

def parse_tribunal(sample_min, sample_max, sample_size):
    """
    Parses all tribunal cases
    """
    #initialize error file
    error_file = 'Resources/ErrorURL.txt'
    e_file = open(error_file, 'w')
    e_file.write("ERRORS:\n")
    e_file.close()
    
    base_url = "http://na.leagueoflegends.com/tribunal/en/case/"
    post_url = "/#nogo"
    
    for case in random.sample(xrange(sample_min, sample_max+1), sample_size):
        final_url = base_url + str(case) + post_url
        parse_case(final_url, case, error_file)
        
def parse_case(case_url, case_num, error_file):
    """
    Parses a single tribunal case from url
    """
    
    try:
        browser = webdriver.Firefox()
        browser.get(case_url)
        print case_num
        game_tabs = browser.find_elements_by_xpath('//a[contains(@id, "tab-")][@href="#nogo"][span/@class="game-number"]')
            
    except:
        print "ERROR: " + str(case_num)
        error_string = case_url + "@" + case_num
        write_error(error_file, error_string)
        browser.quit()
        return

    for index, tab in enumerate(game_tabs, start=1):

        case_num_hybrid = str(case_num) + "_" + str(index)

        try:
            tab.click()
            game = browser.find_element_by_id('game%d' % index)
            if index == 1:            
                browser.execute_script("window.scrollBy(0, -50);")
        except:
            continue
            
        try:
            game_type = game.find_element_by_id('stat-type-fill').text
            game_length = game.find_element_by_id('stat-length-fill').text
            game_outcome = game.find_element_by_id('stat-outcome-fill').text
            game_chat = game.find_element_by_class_name('chat-log')
            #Ally chat processing
            achat_arr = [msg.text for msg in game_chat.find_elements_by_class_name("ally") if msg.text]
        
            #Reported chat processing
            rchat_arr = [msg.text for msg in game_chat.find_elements_by_class_name("reported-player") if msg.text]
            
            #Enemy chat processing
            echat_arr = [msg.text for msg in game_chat.find_elements_by_class_name("enemy") if msg.text]
        except:
            print "ERROR: " + str(case_num_hybrid)
            error_string = case_url + "@" + case_num_hybrid
            write_error(error_file, error_string)
            continue
    
        #string storage
        ally_chat_html = ""
        enemy_chat_html = ""
        
        #processed array to html string
        for line in achat_arr:
            ally_chat_html = ally_chat_html + line + "\n"
        for line in rchat_arr:
            ally_chat_html = ally_chat_html + line + "\n"
        for line in echat_arr:
            enemy_chat_html = ally_chat_html + line + "\n"
            
        #Organize chats
        victory_file = "Results/Victory_Chat/V" + str(case_num_hybrid) + ".txt"
        defeat_file = "Results/Defeat_Chat/D" + str(case_num_hybrid) + ".txt"
        ally_file = ""
        enemy_file = ""
        
        if game_outcome == "Win":
            ally_file = victory_file
            enemy_file = defeat_file
        
        elif game_outcome == "Loss":
            ally_file = defeat_file
            enemy_file = victory_file
        else:
            print "File Write Cancelled: " +str(case_num_hybrid)
            continue
        
        try:
            ally_chat = open(ally_file, 'w')
            ally_chat.write("GAME TYPE: " + str(game_type) + "\n")
            ally_chat.write("GAME LENGTH: " + str(game_length) + "\n")
            ally_chat.write(ally_chat_html)
            ally_chat.close
            
            enemy_chat = open(enemy_file, 'w')
            enemy_chat.write("GAME TYPE: " + str(game_type) + "\n")
            enemy_chat.write("GAME LENGTH: " + str(game_length) + "\n")
            enemy_chat.write(enemy_chat_html)
            enemy_chat.close
            
            print "File Write Success: " +str(case_num_hybrid)
        except:
            print "File Write Fail: " +str(case_num_hybrid)
            error_string = case_url + "@" + case_num_hybrid
            write_error(error_file, error_string)
            continue
            
    browser.quit()

    
def write_error(error_file, error_string):
    """
    Writes an error to a specified file
    @param error_file
    @param error_string
    """
    e_file = open(error_file, 'a')
    e_file.write(error_string)
    e_file.close
    
    
def min_interface():
    """
    Gets and sanatizes a user's minimum case number input
    @return sample_min, the minimum case number
    """
    valid_input = False
    sample_min = MIN_CASE_NUMBER
    while valid_input == False:
        input_min = raw_input("Enter Minimum Case Number:")
        if input_min.isdigit() and int(input_min) >= MIN_CASE_NUMBER:
            sample_min = int(input_min)
            valid_input = True
        else:
            print "Input invalid, use default (" + str(sample_min) + ")?"
            err_opt = raw_input("Press y then enter for yes, otherwise press n then enter for no:")
            if err_opt == 'y':
                valid_input = True
    return sample_min
    
    
def max_interface():
    """
    Gets and sanatizes a user's maximum case number input
    @return sample_min, the maximum case number
    """
    valid_input = False
    sample_max = MAX_CASE_NUMBER
    while valid_input == False:
        input_max = raw_input("Enter Maximum Case Number:")
        if input_max.isdigit() and int(input_max) <= (MAX_CASE_NUMBER + 100000):
            sample_max = int(input_max)
            valid_input = True
        else:
            print "Input invalid, use default (" + str(sample_max) + ")?"
            err_opt = raw_input("Press y then enter for yes, otherwise press n then enter for no:")
            if err_opt == 'y':
                valid_input = True
    return sample_max
    
    
def size_interface(sample_min, sample_max):
    """
    Gets and sanatizes a user's random sample size
    @return sample_amount, the random sample size
    """
    valid_input = False
    sample_amount = sample_max - sample_min + 1
    print "Your full sample size is " + str(sample_amount)
    while valid_input == False:
        input_amount = raw_input("Enter Sample Size:")
        if input_amount.isdigit() and int(input_amount) <= (sample_max - sample_min + 1) and int(input_amount) > 0:
            sample_amount = int(input_amount)
            valid_input = True
        else:
            print "Input invalid, use default (" + str(sample_amount) + ")?"
            err_opt = raw_input("Press y then enter for yes, otherwise press n then enter for no:")
            if err_opt == 'y':
                valid_input = True
    return sample_amount
    
    
#Main method
if __name__ == "__main__":
    #TODO: parallel
    main_flag = False
    while main_flag == False:
        print "Tribunal Case Info (Updated " + str(UPDATED_DATE) + "):\nMin: " + str(MIN_CASE_NUMBER) + " | Max: " + str(MAX_CASE_NUMBER) + "\n"
    
        sample_min = min_interface()
        sample_max = max_interface()
    
        if sample_min >= sample_max:
            print "ERROR: minimum case number is larget than the maximum\n\nRestarting\n\n"
            continue
        
        sample_amount = size_interface(sample_min, sample_max)
        
        print "\n\nVerification:"
        print "Minimum Case Number: " + str(sample_min)
        print "Minimum Case Number: " + str(sample_max)
        print "Random Sample Size:  " + str(sample_amount)
        print "\n"
        print "Is this information correct?"
        verify_opt = raw_input("Press y then enter for yes, press n then enter for no\n or press any other key then enter to exit:")
        if verify_opt == 'y':
                parse_tribunal(sample_min, sample_max, sample_amount)
                print "Parsing completed successfully!"
                print "\n"
                print "Do you want to parse another sample?"
                reset_opt = raw_input("Press y then enter for yes or press any other key then enter to exit:")
                if reset_opt == 'y':
                    continue
                else:
                    main_flag = True
        elif verify_opt == 'n':
            continue
        else:
            main_flag = True
        
    
    
    
"""
THREAD SOLN 1:

import urllib, threading
from Queue import Queue
 
class FileGetter(threading.Thread):
    def __init__(self, url):
        self.url = url
        self.result = None
        threading.Thread.__init__(self)
 
    def get_result(self):
        return self.result
 
    def run(self):
        try:
            f = urllib.urlopen(url)
            contents = f.read()
            f.close()
            self.result = contents
         except IOError:
            print "Could not open document: %s" % url
 
def get_files(files):
    def producer(q, files):
        for file in files:
            thread = FileGetter(file)
            thread.start()
            q.put(thread, True)
 
    finished = []
    def consumer(q, total_files):
        while len(finished) &lt; total_files:
            thread = q.get(True)
            thread.join()
            finished.append(thread.get_result())
 
    q = Queue(3)
    prod_thread = threading.Thread(target=producer, args=(q, files))
    cons_thread = threading.Thread(target=consumer, args=(q, len(files))
    prod_thread.start()
    cons_thread.start()
    prod_thread.join()
    cons_thread.join()
"""
