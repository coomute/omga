#!/usr/bin/python
import MySQLdb
import ucsv as csv
import codecs

db = MySQLdb.connect(
                        host="localhost",
                        user="symfony",
                        passwd="symfony",
                        db="symfony",
                        charset="utf8", 
                        use_unicode=True,
                     )
cursor = db.cursor()
meta_csv = []
meta = []
genre=[]
'''
    for row in reader:
        if row[1] not in meta_csv:
            meta_csv.append(row[1])
'''

#meta_query = db.query("SELECT * FROM Meta")
meta_results = cursor.execute("SELECT * FROM Meta")
for meta_result in cursor.fetchall():
    meta.append( {'id' : int(meta_result[0]), 'name' : meta_result[1]})

genre_results = cursor.execute("SELECT * FROM Genre")
for genre_result in cursor.fetchall():
    genre.append( {'id' : int(genre_result[0]), 'name' : genre_result[1]})


with codecs.open('bdm.csv', 'rb') as f:
    reader = csv.reader(f)
    for row in reader:
        if row[0] == 'Style musical':
            continue
        genre_id = False
        for g in genre:
           if row[0] == g['name']:
              genre_id =  g['id']

'''
        #Add synonymous
        for row_syn in row[4].split(','):
           row_syn = row_syn.strip('?').strip()
           for g in genre:
              if row_syn.lower() == g['name'].lower():
                 syn_id =  g['id']
           if not genre_id or row_syn == '':
              continue

           """  
           elif not syn_id:
               sql = 'INSERT INTO Genre (name, year_min) VALUES ("'+row_syn+'","'+year+'");'
               print sql
               cursor.execute(sql)
               db.commit()
               syn_id = cursor.lastrowid
               sql = "INSERT INTO MetaGenreRelation (meta_id, genre_id) VALUES ("+str(my_meta_id)+","+str(syn_id)+");"
               print sql
               cursor.execute(sql)
               db.commit()
               """

           sql = 'INSERT INTO GenreSyn (syn_name, genre_id) VALUES ("'+row_syn+'",'+str(genre_id)+');'
           print sql
           cursor.execute(sql)
           db.commit()
'''





#add parents
with codecs.open('bdm.csv', 'rb') as f:
    reader = csv.reader(f)
    for row in reader:
        year = row[2]
        if type(year) == int:
            year = str(year)
        genre_id = meta_id = False
        if row[0] == 'Style musical':
          continue
        """
        for m in meta:
           if row[1] == m['name']:
              my_meta_id =  m['id']
        """
        for g in genre:
           if row[0] == g['name']:
              genre_id =  g['id']
        for row_parent in row[3].split(','):
            parent_id =  False
            for g in genre:
                if row_parent.strip().lower() == g['name'].lower():
                    parent_id =  g['id']
            if not parent_id and not row_parent == '':
                   sql = 'INSERT INTO Genre (name, year_min) VALUES ("'+row_parent.strip()+'","'+year+'");'
                   print sql
                   cursor.execute(sql)
                   db.commit()
                   parent_id = cursor.lastrowid
                   genre.append( {'id' : int(parent_id), 'name' : row_parent.strip()})
                   """
                   sql = "INSERT INTO MetaGenreRelation (meta_id, genre_id) VALUES ("+str(my_meta_id)+","+str(parent_id)+");"
                   print sql
                   cursor.execute(sql)
                   #db.commit()
                   """

            elif not genre_id or not parent_id:
               continue

            sql = "INSERT INTO GenreRel (genre_1_id, genre_2_id, rel_type_id) VALUES ("+str(genre_id)+","+str(parent_id)+", 1);"
            print sql
            cursor.execute(sql)
            db.commit()
'''
#create meta-genre relationships
with codecs.open('bdm.csv', 'rb') as f:
    reader = csv.reader(f)
    my_genre_id = my_meta_id = False
    for row in reader:
        for g in genre:
           if row[0] == g['name']:
              my_genre_id =  g['id']
        for m in meta:
           if row[1] == m['name']:
              my_meta_id =  m['id']

        if row[0] == 'Style musical':
            continue
        if not my_meta_id or not my_genre_id:
            continue

        sql = "INSERT INTO MetaGenreRelation (meta_id, genre_id) VALUES ("+str(my_meta_id)+","+str(my_genre_id)+");"
        print sql
        cursor.execute(sql)
        db.commit()
#add meta from csv
for my_meta in meta:
    sql = "INSERT INTO Meta (name) VALUES ('"+my_meta+"');"
    print sql
    cursor.execute(sql)
    db.commit()
''' 

print "Done !"
db.close()
