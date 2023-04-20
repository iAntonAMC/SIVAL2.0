import sys
import pymysql
from openpyxl import Workbook
from openpyxl.chart import BarChart, Series, Reference


book = Workbook()
sheet = book.active
query_len = int(sys.argv[1])
query = ""
for i in range(2, query_len + 2):
    query += sys.argv[i]
    query += " "

print(query)


class ChartBuilder:

    def __init__(self):
        try:
            self.cnxn = pymysql.connect(
                host="localhost", user="root", password="", db="sival"
            )

            self.cursor = self.cnxn.cursor()

            print("\nSTATUS CODE: 200")
            print("Connected to Database...\n")
        except Exception as error:
            print(f"Connection ERROR : {error.args}")


    def get_dates(self, query):
        try:
            self.cursor.execute(query)  # Ejecuta la consulta
            results = self.cursor.fetchall()  # Guarda los registros en la variable
            dates = []
            sheet["A1"] = "Dates:"  # Coloca Título en la Celda A1
            for i in results:
                print("Date: ", i[0])
                sheet.append(i)
                dates.append(i[0])  # Añade al arreglo las fechas, para usarlas más adelante en el graficador
            book.save("chart_report.xlsx")  # Guarda el libro de Excel
            return dates  # Regresa el arreglo con las fechas obtenidas

        except Exception as error:
            print(f"ERROR at get fechas, method says: {error.args}")


    def count_results(self, dates):
            query = "SELECT COUNT(*) FROM entrances WHERE entry_date = "
            queries = []
            sheet["B1"] = "Totals:"
            try:
                for date in dates:
                    queries.append(query + "'" + str(date) + "'" + ';')
                for i in range (0, len(queries)):
                    self.cursor.execute(queries[i])
                    cantity = self.cursor.fetchone()
                    sheet["B" + str(i+2)] = cantity[0]

                book.save("chart_report.xlsx") 

            except Exception as error:
                print(f"Error at count_results, method says: {error.args}")


    def make_chart(self):
        try:
            chart = BarChart()
            chart.type = "col"
            chart.style = 5
            chart.title = "Students' Entrances"
            chart.y_axis.title = 'Cantity Of Students'
            chart.x_axis.title = 'Date'

            data = Reference(sheet, min_col=2, min_row=2, max_row=11) #datos cantidaes eje y
            dates = Reference(sheet, min_col=1, min_row=2, max_row=11) #datos de fechas eje x
            chart.add_data(data, titles_from_data=True)
            chart.set_categories(dates)
            chart.shape = 6

            sheet.add_chart(chart, 'D1') #COLOCA LA GRAFICA

            book.save("chart_report.xlsx") #GUARDA LOS CAMBIOS

        except Exception as error:
            print(f"ERROR at make_chart, method says: {error.args}")



cb = ChartBuilder()
dates = cb.get_dates(query)
cb.count_results(dates)
cb.make_chart()
