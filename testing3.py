from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from time import sleep
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.support.ui import Select

# set up the driver
driver = webdriver.Edge()

try:
    # navigate to the login page
    driver.get("http://localhost/shoes/login.php")

    # enter the username
    username_input = driver.find_element(By.ID, "nm")
    username_input.send_keys("reshma")

    # enter the password
    password_input = driver.find_element(By.ID, "ps")
    password_input.send_keys("Reshma@123")

    driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
    sleep(2)

    # submit the form
    submit_button = driver.find_element(By.ID, "subBtn")
    submit_button.click()

    # wait for the page to load
    

    # navigate to the edit profile page
    driver.get("http://localhost/shoes/edit_profile.php")

    # enter the name
    name_input = driver.find_element(By.ID, "fname")
    name_input.send_keys("Reshma")

    # enter the username
    username_input = driver.find_element(By.ID, "uname")
    username_input.send_keys("Reshu")

    # enter the mobile number
    mobile_input = driver.find_element(By.ID, "phone")
    mobile_input.send_keys("9654329103")

    # enter the email
    email_input = driver.find_element(By.ID, "email")
    email_input.send_keys("reshu@gmail.com")

    # enter the address
    address_input = driver.find_element(By.ID, "address")
    address_input.send_keys("Reshma Villa")

    # scroll to the bottom of the page
    driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
    sleep(2)

    # submit the form
    submit_button = driver.find_element(By.ID, "Update")
    submit_button.click()
    sleep(5)

    print("-----Profile Updated Sucessfully-----")

except Exception as e:
    print("-----Profile Update Failed-----")

finally:
    # close the browser window
    driver.quit()
