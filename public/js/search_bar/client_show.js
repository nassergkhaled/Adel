console.table(client_cases);
const search = function (search) {
    // let searchInput = document.getElementById("search").value.toLowerCase();
    let searchInput = search.value.toLowerCase();
    let filteredClients = client_cases.filter((client_cases) => {
        return client_cases.title.toLowerCase().includes(searchInput);
    });
    console.table(filteredClients);
    displayClients(filteredClients);
};
const displayClients = function (filteredClients) {
    const table_body = document.getElementById("table_body");
    table_body.innerHTML = "";

    filteredClients.forEach((client_cases) => {
        let statusClass = "";
        let statusName = "";

        switch (client_cases.status) {
            case "Open":
                statusClass =
                    "bg-[#c1ebd7] px-2 py-1 rounded-md text-[#06A759]";
                statusName = "مفتوحة";
                break;
            case "Closed":
                statusClass =
                    "bg-[#f9c6c6] px-2 py-1 rounded-md text-[#EA1B1B]";
                statusName = "مغلقة";

                break;
            case "Pending":
                statusClass =
                    "bg-[#e9e2c0] px-2 py-1 rounded-md text-[#A78D06]";
                statusName = "قيد الانتظار";

                break;
            default:
                break;
        }
        const clientHTML = `
            
                <tr class=" border-[#E6E8EB]">
                    <td class=" text-lg underline "><a
                            class="hover:bg-adel-Light-active hover:text-adel-Dark-hover p-2 rounded-lg transition-all ease-in-out duration-150"
                            href="/legalCases/${client_cases.id}">${client_cases.title}</a>
                    </td>
                    <td class=" text-lg"><span
                            class="${statusClass}">${statusName}</span></td>
                    <td class=" text-lg">${client_cases.open_date}</td>
                    <td class=" text-lg">${client_cases.close_date}</td>

                </tr>
        `;
        table_body.innerHTML += clientHTML;
    });
};
