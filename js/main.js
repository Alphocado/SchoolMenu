const list_belanjaan = document.getElementById("list_belanjaan");
let count = !1;
const currentDate = new Date(),
    formattedDate = formatDateToDMYHIS(currentDate);
function tambah(t, e, a) {
    let n = parseInt(document.getElementById("total_harga").innerText);
    (n += a), (document.getElementById("total_harga").innerText = n += a), (document.getElementById("total_harga_input").value = n += a);
    if (0 == document.querySelectorAll("#id" + t).length)
        list_belanjaan.innerHTML += `
      <div class="kolom" id="id${t}">
        <div class="menu">
          <img src="img/menu/${t}.jpg" alt="">
          <p>${e}: Rp.${a}</p>
        </div>
        <div class="badge" id="BT_${t}">1</div>
        <input type="text" value="${e}" name="${e}/nama_pesanan" hidden><input type="number" value="${a}" name="${e}/harga" hidden><input type="number" class="inputValue" name="${e}/jumlah" id="CT_${t}" hidden><input type="text" name="waktu_pesanan" value="${formattedDate}" hidden></div>`;
    else {
        let l = document.getElementById("BT_" + t);
        l.innerHTML++;
    }
    updateValues(), (count = !0), (document.getElementById("submitButton").disabled = !1);
}
function updateValues() {
    let t = document.getElementsByClassName("inputValue"),
        e = document.getElementsByClassName("badge");
    for (var a = 0; a < e.length; a++) t[a].value = e[a].innerText;
}
function formatDateToDMYHIS(t) {
    if (!(t instanceof Date) || isNaN(t)) throw Error("Invalid date");
    let e = t.getDate().toString().padStart(2, "0"),
        a = (t.getMonth() + 1).toString().padStart(2, "0"),
        n = t.getFullYear().toString().slice(-2),
        l = t.getHours().toString().padStart(2, "0"),
        i = t.getMinutes().toString().padStart(2, "0"),
        d = t.getSeconds().toString().padStart(2, "0"),
        r = `${e}-${a}-${n} ${l}:${i}:${d}`;
    return r;
}
