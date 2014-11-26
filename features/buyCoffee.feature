Feature: Serve coffee
  In order to earn money
  The waitress should be able to emit bills

  Scenario: A waitress emit the bill for a customer
    Given a product named "Short espresso" and priced 1 Euro was added to the menu
    And   An order has been made for a "Short espresso"
    When  I emit the bill for that order
    Then  The total amount on the bill should be equal to 1 Euro.
