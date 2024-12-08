# QLS Assessment

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
1. In the root of the repository run the following command: `sail up -d && sail composer install && sail artisan migrate && sail npm install && sail npm run dev`
1. Navigate to `http://localhost` in your browser

## Tasks:
- [x] Frontend form to request shipping label info
- [x] API request to get shipping label PDF
- [x] Combine shipping label with order information into a single PDF
- [x] Show created PDF
- Error handling (API and code)
