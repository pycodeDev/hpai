from flask import Flask, jsonify, request
from flask_cors import CORS
import connection
import helpers
import json

app = Flask(__name__)
CORS(app, origins='*', allow_headers='*')
conn = connection.getConnection()


@app.route('/')
def index():
    getData = '''SELECT id_prim from transaksi_penjualan group by id_prim order by id_prim asc'''
    getSQL = '''SELECT p.nama_produk,p.stok,tp.* from transaksi_penjualan tp left join produk p on tp.id_prim=p.id_prim where tp.id_prim=%s'''
    t = []
    cur = conn.cursor()
    cur.execute(getData)
    rv = cur.fetchall()

    # get data for
    pjg = len(rv)
    for i in range(0, pjg):
        stri = rv[i]
        a = stri.get('id_prim')
        cur.execute(getSQL, (a))
        rs = cur.fetchall()
        l = rs[0]
        myDict = {
            "id_prim": a,
            "nama_produk": l.get('nama_produk'),
            "stok_produk": l.get('stok'),
            "prediksi": helpers.parseData(rs),
            "bulan": helpers.saran_bulan(rs),
            "saran": helpers.saran_stok(l.get('stok'), helpers.parseData(rs))
        }
        t.append(myDict)
    return jsonify(t)


@app.route('/graph', methods=["POST"])
def graph():
    t = []
    id_produk = request.get_json('id')
    a = id_produk.get('id')
    getSQL = '''SELECT p.nama_produk,p.stok,tp.* from transaksi_penjualan tp left join produk p on tp.id_prim=p.id_prim where tp.id_prim=%s'''
    cur = conn.cursor()
    cur.execute(getSQL, (a))
    rs = cur.fetchall()
    la = rs[0]
    for i in range(0, len(rs)):
        l = rs[i]
        myDict = {
            "id_prim": a,
            "nama_produk": l.get('nama_produk'),
            "bulan": helpers.get_bulan(l.get('tanggal')),
            "qty": l.get('QTY')
        }
        t.append(myDict)
    myDict = {
        "id_prim": a,
        "nama_produk": la.get('nama_produk'),
        "bulan": helpers.saran_bulan(rs),
        "qty": helpers.parseData(rs)
    }
    t.append(myDict)
    return jsonify(t)


if __name__ == '__main__':
    app.run(debug=True)
