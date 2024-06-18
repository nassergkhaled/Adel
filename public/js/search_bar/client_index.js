const search = function (search) {
    // let searchInput = document.getElementById("search").value.toLowerCase();
    let searchInput = search.value.toLowerCase();
    let filteredClients = clients.filter((client) => {
        let idNumberStr = client.id_number.toString();

        return (
            client.full_name.toLowerCase().includes(searchInput) ||
            idNumberStr.toLowerCase().includes(searchInput) ||
            client.phone_number.toLowerCase().includes(searchInput)
        );
    });
    console.table(filteredClients);
    displayClients(filteredClients);
};
const displayClients = function (filteredClients) {
    const table_body = document.getElementById("table_body");
    table_body.innerHTML = "";
    filteredClients.forEach((client) => {
        const clientHTML = `
            <tr>
                <td class="text-center py-2 text-black border-b underline underline-offset-4">
                    <a class="hover:bg-adel-Light-active hover:text-adel-Dark-hover p-2 rounded-lg transition-all ease-in-out duration-150"
                        href="/clients/${client.id}">${client.full_name}</a>
                </td>
                <td class="text-center py-2 text-black border-b">${client.id_number}</td>
                <td class="text-center py-2 text-black border-b" dir="ltr">
                    ${client.phone_number}
                </td>
                <td class="text-center py-2 text-black border-b">
                    "N/A"
                </td>
                <td class="text-center py-2 text-black border-b"><input type="checkbox"
                        class="border-[#E1E1E1] text-[#f59d5d] focus:ring-transparent transition ease-in-out duration-100  hover:bg-adel-Light-active shadow-sm size-5">
                </td>
            </tr>
        `;
        table_body.innerHTML += clientHTML;
    });
};
