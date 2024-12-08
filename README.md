# QLS Assessment
An app to create packing slip PDFs from shipping labels and order information.

## Installation
### Pre-requisites
- Docker (Desktop)

### Steps
1. Clone the repository
1. Copy the `.env.example` file to `.env` and update the following variables:
    - `QLS_API_URL` - The URL of the QLS API
    - `QLS_API_USER` - The username used to authenticate with the QLS API
    - `QLS_API_PASSWORD` - The passwrod used to authenticate with the QLS API
    - `QLS_COMPANY_ID` - The company ID used for creating shipments
    - `QLS_BRAND_ID` - The brand ID used for creating shipments
1. In the root of the repository run the following command: `./vendor/bin/sail up -d && ./vendor/bin/sail composer install && ./vendor/bin/sail artisan migrate && ./vendor/bin/sail npm install && ./vendor/bin/sail npm run dev`
1. Navigate to `http://localhost` in your browser
