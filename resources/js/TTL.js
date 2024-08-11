function TTL(tempat_lahir, tanggal_lahir) {
    const options = { day: "numeric", month: "long", year: "numeric" };
    tanggal_lahir = new Date(tanggal_lahir).toLocaleDateString(
        "id-ID",
        options
    );

    return `${tempat_lahir}, ${tanggal_lahir}`;
}

export default TTL;
