<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Simple Bootstrap Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        #content {
            max-width: 300px;
            margin: 20px auto;
        }

        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            margin-right: 10px;
            cursor: pointer;
        }

        #items {
            list-style: none;
            padding: 0;
        }

        #items li {
            border: 1px solid #ccc;
            margin-bottom: 5px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div id="content">
        <ul id="items">
            
        </ul>

        <ul class="pagination" id="pagination"></ul>
    </div>


    <script>
        const itemsPerPage = 5;
        const totalItems = 25;
        const items = [];

        for (let i = 1; i <= totalItems; i++) {
            items.push(`Item ${i}`);
        }

        let currentPage = 1;

        function displayItems(page) {
            const startIndex = (page - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            const displayedItems = items.slice(startIndex, endIndex);

            const itemsList = document.getElementById('items');
            itemsList.innerHTML = '';

            displayedItems.forEach(item => {
                const li = document.createElement('li');
                li.textContent = item;
                itemsList.appendChild(li);
            });
        }

        function setupPagination() {
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            const paginationElement = document.getElementById('pagination');
            paginationElement.innerHTML = '';

            for (let i = 1; i <= totalPages; i++) {
                const li = document.createElement('li');
                li.textContent = i;
                li.addEventListener('click', () => {
                    currentPage = i;
                    displayItems(currentPage);
                    updatePaginationStyles();
                });
                paginationElement.appendChild(li);
            }

            updatePaginationStyles();
        }

        function updatePaginationStyles() {
            const paginationItems = document.querySelectorAll('.pagination li');
            paginationItems.forEach((item, index) => {
                if (index + 1 === currentPage) {
                    item.style.fontWeight = 'bold';
                } else {
                    item.style.fontWeight = 'normal';
                }
            });
        }

        // Initial setup
        displayItems(currentPage);
        setupPagination();
    </script>
</body>

</html>