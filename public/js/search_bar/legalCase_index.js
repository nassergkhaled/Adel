console.table(legal_cases);
const search = function (search) {
    // let searchInput = document.getElementById("search").value.toLowerCase();
    let searchInput = search.value.toLowerCase();
    let filteredClients = legal_cases.filter((legal_cases) => {
        return legal_cases.title.toLowerCase().includes(searchInput);
    });
    console.table(filteredClients);
    displayClients(filteredClients);
};
const displayClients = function (filteredClients) {
    const table_body = document.getElementById("table_body");
    table_body.innerHTML = "";

    filteredClients.forEach((legal_cases) => {
        let statusClass = "";
        let statusName = "";

        switch (legal_cases.status) {
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
                <td><a class="hover:bg-adel-Light-active hover:text-adel-Dark-hover p-2 rounded-lg transition-all ease-in-out duration-150 underline underline-offset-4"
                        href="/legalCases/${legal_cases.id}">${legal_cases.title}</a></td>
                        <td>N/A</td>
                <td><span class="${statusClass}">${statusName}</span></td>
                <td >${legal_cases.open_date}</td>
                <td >${legal_cases.close_date}</td>
                <td class="text-end"><input type="checkbox" id="" name=""
                        class="rounded-sm border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100 hover:bg-adel-Light-active shadow-sm size-5">
                </td>
            </tr>
        `;
        table_body.innerHTML += clientHTML;
    });
};
