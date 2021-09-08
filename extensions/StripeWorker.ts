const stripe = require('stripe')('sk_test_51JIOoHCGRmSKq6LqDnK5KcIqCDRPQ8WFmuNsk5gpTaStYSQBwoujfqg9FN3EbH7ntZ2JmBwHlgLTehvxaleiSUSV00ePc7MG0k');

async function createCustomer(email:string) {
    const customer = await stripe.customers.create({
        description: 'My First Test Customer (created for API docs)',
        email: email
    });

    return customer
}