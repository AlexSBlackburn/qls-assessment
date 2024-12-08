# QLS Assessment

## Installation

### Pre-requisites
- Docker (Desktop)

### Steps
1. Clone the repository
1. In the root of the repository run the following command: `sail up -d && sail composer install && sail artisan migrate && sail npm install && sail npm run dev`
1. Navigate to `http://localhost` in your browser

## Tasks:
- [x] Frontend form to request shipping label info
- [x] API request to get shipping label PDF
- [x] Combine shipping label with order information into a single PDF
- [x] Show created PDF
- Error handling (API and code)

## ToDo:
- [x] Install Pest for testing
- Research getting content from PDF
- Research how to combine PDFs
