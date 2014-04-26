# -*- coding: utf-8 -*-
"""
Created on Thu Apr 24 14:22:47 2014

@author: Kyle Grage
"""

from selenium import webdriver

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
    for case in range(5555631, 6787079):
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
    
#Main method
if __name__ == "__main__":
    parse_tribunal('Resources/ErrorURL.txt')
