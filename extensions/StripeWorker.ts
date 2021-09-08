const stripe = require('stripe')('sk_test_51JIOoHCGRmSKq6LqDnK5KcIqCDRPQ8WFmuNsk5gpTaStYSQBwoujfqg9FN3EbH7ntZ2JmBwHlgLTehvxaleiSUSV00ePc7MG0k');

/**
 * Creates a new customer
 * @param email The email to use with the customer
 * @returns the customer object
 */
async function createCustomer(email:string) {
    const customer = await stripe.customers.create({
        email: email
    });
    return customer
}

/**
 * Creates new subscription with the customer and the price
 * @param customer The customer id
 * @param itemPrice The price id
 */
async function createSubscription(customer:string, itemPrice:string) {
    const subscription = await stripe.subscriptions.create({
        customer: customer,
        items: [
          {price: itemPrice},
        ],
      });
}