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
    username_input.send_keys("athu")

    # enter the password
    password_input = driver.find_element(By.ID, "ps")
    password_input.send_keys("Athul@123")

    driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
   

    # submit the form
    submit_button = driver.find_element(By.ID, "subBtn")
    submit_button.click()

    # wait for the page to load
    sleep(5)

    # navigate to the edit profile page
    driver.get("http://localhost/shoes/adminpanel.php")

    # enter the category
    cat_input = driver.find_element(By.ID, "m")
    cat_input.send_keys("Women")

     # enter the name
    name_input = driver.find_element(By.ID, "b")
    name_input.send_keys("Heels")

     # enter the name
    qut_input = driver.find_element(By.ID, "d")
    qut_input.send_keys("5")

     # enter the name
    price_input = driver.find_element(By.ID, "c")
    price_input.send_keys("1000")

     # enter the name
    dis_input = driver.find_element(By.ID, "a")
    dis_input.send_keys("The heels are the good propety and can be useful.")

     # enter the name
    brand_input = driver.find_element(By.ID, "s")
    brand_input.send_keys("Nike")

    # enter the name
    img_input = driver.find_element(By.ID, "e")
    img_input.send_keys("C:/xampp/htdocs/shoes/product_img/11.jpg")

    # scroll to the bottom of the page
    driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
    sleep(2)
    
    # submit the form
    submit_button = driver.find_element(By.ID, "add-btn")
    submit_button.click()

    # wait for the page to load
    sleep(5)

    print("-----Item Added Successfully-----")

except Exception as e:
    print("-----Item Add Failed-----")

finally:
    # close the browser window
    driver.quit()
