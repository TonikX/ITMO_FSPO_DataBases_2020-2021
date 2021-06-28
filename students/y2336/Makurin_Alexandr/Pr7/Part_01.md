# Лабораторная работа №7. Часть №1

```
> db.help()
DB methods:
        db.adminCommand(nameOrDocument) - switches to 'admin' db, and runs command [just calls db.runCommand(...)]
        db.aggregate([pipeline], {options}) - performs a collectionless aggregation on this database; returns a cursor
        db.auth(username, password)
        db.cloneDatabase(fromhost) - will only function with MongoDB 4.0 and below
        db.commandHelp(name) returns the help for the command
        db.copyDatabase(fromdb, todb, fromhost) - will only function with MongoDB 4.0 and below
        db.createCollection(name, {size: ..., capped: ..., max: ...})
        db.createUser(userDocument)
        db.createView(name, viewOn, [{$operator: {...}}, ...], {viewOptions})
        db.currentOp() displays currently executing operations in the db
        db.dropDatabase(writeConcern)
        db.dropUser(username)
        db.eval() - deprecated
        db.fsyncLock() flush data to disk and lock server for backups
        db.fsyncUnlock() unlocks server following a db.fsyncLock()
        db.getCollection(cname) same as db['cname'] or db.cname
        db.getCollectionInfos([filter]) - returns a list that contains the names and options of the db's collections
        db.getCollectionNames()
        db.getLastError() - just returns the err msg string
        db.getLastErrorObj() - return full status object
        db.getLogComponents()
        db.getMongo() get the server connection object
        db.getMongo().setSecondaryOk() allow queries on a replication secondary server
        db.getName()
        db.getProfilingLevel() - deprecated
        db.getProfilingStatus() - returns if profiling is on and slow threshold
        db.getReplicationInfo()
        db.getSiblingDB(name) get the db at the same server as this one
        db.getWriteConcern() - returns the write concern used for any operations on this db, inherited from server object if set
        db.hostInfo() get details about the server's host
        db.isMaster() check replica primary status
        db.hello() check replica primary status
        db.killOp(opid) kills the current operation in the db
        db.listCommands() lists all the db commands
        db.loadServerScripts() loads all the scripts in db.system.js
        db.logout()
        db.printCollectionStats()
        db.printReplicationInfo()
        db.printShardingStatus()
        db.printSecondaryReplicationInfo()
        db.resetError()
        db.runCommand(cmdObj) run a database command.  if cmdObj is a string, turns it into {cmdObj: 1}
        db.serverStatus()
        db.setLogLevel(level,<component>)
        db.setProfilingLevel(level,slowms) 0=off 1=slow 2=all
        db.setVerboseShell(flag) display extra information in shell output
        db.setWriteConcern(<write concern doc>) - sets the write concern for writes to the db
        db.shutdownServer()
        db.stats()
        db.unsetWriteConcern(<write concern doc>) - unsets the write concern for writes to the db
        db.version() current version of the server
        db.watch() - opens a change stream cursor for a database to report on all  changes to its non-system collections.
> db.help
function() {
    print("DB methods:");
    print(
        "\tdb.adminCommand(nameOrDocument) - switches to 'admin' db, and runs command [just calls db.runCommand(...)]");
    print(
        "\tdb.aggregate([pipeline], {options}) - performs a collectionless aggregation on this database; returns a cursor");
    print("\tdb.auth(username, password)");
    print("\tdb.cloneDatabase(fromhost) - will only function with MongoDB 4.0 and below");
    print("\tdb.commandHelp(name) returns the help for the command");
    print(
        "\tdb.copyDatabase(fromdb, todb, fromhost) - will only function with MongoDB 4.0 and below");
    print("\tdb.createCollection(name, {size: ..., capped: ..., max: ...})");
    print("\tdb.createUser(userDocument)");
    print("\tdb.createView(name, viewOn, [{$operator: {...}}, ...], {viewOptions})");
    print("\tdb.currentOp() displays currently executing operations in the db");
    print("\tdb.dropDatabase(writeConcern)");
    print("\tdb.dropUser(username)");
    print("\tdb.eval() - deprecated");
    print("\tdb.fsyncLock() flush data to disk and lock server for backups");
    print("\tdb.fsyncUnlock() unlocks server following a db.fsyncLock()");
    print("\tdb.getCollection(cname) same as db['cname'] or db.cname");
    print("\tdb.getCollectionInfos([filter]) - returns a list that contains the names and options" +
          " of the db's collections");
    print("\tdb.getCollectionNames()");
    print("\tdb.getLastError() - just returns the err msg string");
    print("\tdb.getLastErrorObj() - return full status object");
    print("\tdb.getLogComponents()");
    print("\tdb.getMongo() get the server connection object");
    print("\tdb.getMongo().setSecondaryOk() allow queries on a replication secondary server");
    print("\tdb.getName()");
    print("\tdb.getProfilingLevel() - deprecated");
    print("\tdb.getProfilingStatus() - returns if profiling is on and slow threshold");
    print("\tdb.getReplicationInfo()");
    print("\tdb.getSiblingDB(name) get the db at the same server as this one");
    print(
        "\tdb.getWriteConcern() - returns the write concern used for any operations on this db, inherited from server object if set");
    print("\tdb.hostInfo() get details about the server's host");
    print("\tdb.isMaster() check replica primary status");
    print("\tdb.hello() check replica primary status");
    print("\tdb.killOp(opid) kills the current operation in the db");
    print("\tdb.listCommands() lists all the db commands");
    print("\tdb.loadServerScripts() loads all the scripts in db.system.js");
    print("\tdb.logout()");
    print("\tdb.printCollectionStats()");
    print("\tdb.printReplicationInfo()");
    print("\tdb.printShardingStatus()");
    print("\tdb.printSecondaryReplicationInfo()");
    print("\tdb.resetError()");
    print(
        "\tdb.runCommand(cmdObj) run a database command.  if cmdObj is a string, turns it into {cmdObj: 1}");
    print("\tdb.serverStatus()");
    print("\tdb.setLogLevel(level,<component>)");
    print("\tdb.setProfilingLevel(level,slowms) 0=off 1=slow 2=all");
    print("\tdb.setVerboseShell(flag) display extra information in shell output");
    print(
        "\tdb.setWriteConcern(<write concern doc>) - sets the write concern for writes to the db");
    print("\tdb.shutdownServer()");
    print("\tdb.stats()");
    print(
        "\tdb.unsetWriteConcern(<write concern doc>) - unsets the write concern for writes to the db");
    print("\tdb.version() current version of the server");
    print("\tdb.watch() - opens a change stream cursor for a database to report on all " +
          " changes to its non-system collections.");
    return __magicNoPrint;
}
> db.stats()
{
        "db" : "test",
        "collections" : 0,
        "views" : 0,
        "objects" : 0,
        "avgObjSize" : 0,
        "dataSize" : 0,
        "storageSize" : 0,
        "totalSize" : 0,
        "indexes" : 0,
        "indexSize" : 0,
        "scaleFactor" : 1,
        "fileSize" : 0,
        "fsUsedSize" : 0,
        "fsTotalSize" : 0,
        "ok" : 1
}
> use learn
switched to db learn
> show dbs
admin   0.000GB
config  0.000GB
local   0.000GB
> db.unicorns.insert({name: 'Aurora', gender: 'f', weight: 450})
WriteResult({ "nInserted" : 1 })
> db.getCollectionNames()
[ "unicorns" ]
> db.unicorns.stats()
{
        "ns" : "learn.unicorns",
        "size" : 69,
        "count" : 1,
        "avgObjSize" : 69,
        "storageSize" : 20480,
        "freeStorageSize" : 0,
        "capped" : false,
        "wiredTiger" : {
                "metadata" : {
                        "formatVersion" : 1
                },
                "creationString" : "access_pattern_hint=none,allocation_size=4KB,app_metadata=(formatVersion=1),assert=(commit_timestamp=none,durable_timestamp=none,read_timestamp=none,write_timestamp=off),block_allocation=best,block_compressor=snappy,cache_resident=false,checksum=on,colgroups=,collator=,columns=,dictionary=0,encryption=(keyid=,name=),exclusive=false,extractor=,format=btree,huffman_key=,huffman_value=,ignore_in_memory_cache_size=false,immutable=false,import=(enabled=false,file_metadata=,repair=false),internal_item_max=0,internal_key_max=0,internal_key_truncate=true,internal_page_max=4KB,key_format=q,key_gap=10,leaf_item_max=0,leaf_key_max=0,leaf_page_max=32KB,leaf_value_max=64MB,log=(enabled=true),lsm=(auto_throttle=true,bloom=true,bloom_bit_count=16,bloom_config=,bloom_hash_count=8,bloom_oldest=false,chunk_count_limit=0,chunk_max=5GB,chunk_size=10MB,merge_custom=(prefix=,start_generation=0,suffix=),merge_max=15,merge_min=0),memory_page_image_max=0,memory_page_max=10m,os_cache_dirty_max=0,os_cache_max=0,prefix_compression=false,prefix_compression_min=4,readonly=false,source=,split_deepen_min_child=0,split_deepen_per_child=0,split_pct=90,tiered=(chunk_size=1GB,tiers=),tiered_storage=(auth_token=,bucket=,local_retention=300,name=,object_target_size=10M),type=file,value_format=u,verbose=[],write_timestamp_usage=none",
                "type" : "file",
                "uri" : "statistics:table:collection-0-8547944766694737830",
                "LSM" : {
                        "bloom filter false positives" : 0,
                        "bloom filter hits" : 0,
                        "bloom filter misses" : 0,
                        "bloom filter pages evicted from cache" : 0,
                        "bloom filter pages read into cache" : 0,
                        "bloom filters in the LSM tree" : 0,
                        "chunks in the LSM tree" : 0,
                        "highest merge generation in the LSM tree" : 0,
                        "queries that could have benefited from a Bloom filter that did not exist" : 0,
                        "total size of bloom filters" : 0,
                        "sleep for LSM checkpoint throttle" : 0,
                        "sleep for LSM merge throttle" : 0
                },
                "block-manager" : {
                        "allocations requiring file extension" : 4,
                        "blocks allocated" : 4,
                        "blocks freed" : 0,
                        "checkpoint size" : 4096,
                        "file allocation unit size" : 4096,
                        "file bytes available for reuse" : 0,
                        "file magic number" : 120897,
                        "file major version number" : 1,
                        "file size in bytes" : 20480,
                        "minor version number" : 0
                },
                "btree" : {
                        "btree checkpoint generation" : 7,
                        "btree clean tree checkpoint expiration time" : 0,
                        "column-store fixed-size leaf pages" : 0,
                        "column-store internal pages" : 0,
                        "column-store variable-size RLE encoded values" : 0,
                        "column-store variable-size deleted values" : 0,
                        "column-store variable-size leaf pages" : 0,
                        "fixed-record size" : 0,
                        "maximum internal page key size" : 368,
                        "maximum internal page size" : 4096,
                        "maximum leaf page key size" : 2867,
                        "maximum leaf page size" : 32768,
                        "maximum leaf page value size" : 67108864,
                        "maximum tree depth" : 3,
                        "number of key/value pairs" : 0,
                        "overflow pages" : 0,
                        "pages rewritten by compaction" : 0,
                        "row-store empty values" : 0,
                        "row-store internal pages" : 0,
                        "row-store leaf pages" : 0
                },
                "cache" : {
                        "data source pages selected for eviction unable to be evicted" : 0,
                        "eviction walk passes of a file" : 0,
                        "bytes currently in the cache" : 1194,
                        "bytes dirty in the cache cumulative" : 847,
                        "bytes read into cache" : 0,
                        "bytes written from cache" : 165,
                        "checkpoint blocked page eviction" : 0,
                        "eviction walk target pages histogram - 0-9" : 0,
                        "eviction walk target pages histogram - 10-31" : 0,
                        "eviction walk target pages histogram - 128 and higher" : 0,
                        "eviction walk target pages histogram - 32-63" : 0,
                        "eviction walk target pages histogram - 64-128" : 0,
                        "eviction walk target pages reduced due to history store cache pressure" : 0,
                        "eviction walks abandoned" : 0,
                        "eviction walks gave up because they restarted their walk twice" : 0,
                        "eviction walks gave up because they saw too many pages and found no candidates" : 0,
                        "eviction walks gave up because they saw too many pages and found too few candidates" : 0,
                        "eviction walks reached end of tree" : 0,
                        "eviction walks restarted" : 0,
                        "eviction walks started from root of tree" : 0,
                        "eviction walks started from saved location in tree" : 0,
                        "hazard pointer blocked page eviction" : 0,
                        "history store table insert calls" : 0,
                        "history store table insert calls that returned restart" : 0,
                        "history store table out-of-order resolved updates that lose their durable timestamp" : 0,
                        "history store table out-of-order updates that were fixed up by moving existing records" : 0,
                        "history store table out-of-order updates that were fixed up during insertion" : 0,
                        "history store table reads" : 0,
                        "history store table reads missed" : 0,
                        "history store table reads requiring squashed modifies" : 0,
                        "history store table truncation by rollback to stable to remove an unstable update" : 0,
                        "history store table truncation by rollback to stable to remove an update" : 0,
                        "history store table truncation to remove an update" : 0,
                        "history store table truncation to remove range of updates due to key being removed from the data page during reconciliation" : 0,
                        "history store table truncation to remove range of updates due to non timestamped update on data page" : 0,
                        "history store table writes requiring squashed modifies" : 0,
                        "in-memory page passed criteria to be split" : 0,
                        "in-memory page splits" : 0,
                        "internal pages evicted" : 0,
                        "internal pages split during eviction" : 0,
                        "leaf pages split during eviction" : 0,
                        "modified pages evicted" : 0,
                        "overflow pages read into cache" : 0,
                        "page split during eviction deepened the tree" : 0,
                        "page written requiring history store records" : 0,
                        "pages read into cache" : 0,
                        "pages read into cache after truncate" : 1,
                        "pages read into cache after truncate in prepare state" : 0,
                        "pages requested from the cache" : 2,
                        "pages seen by eviction walk" : 0,
                        "pages written from cache" : 2,
                        "pages written requiring in-memory restoration" : 0,
                        "tracked dirty bytes in the cache" : 0,
                        "unmodified pages evicted" : 0
                },
                "cache_walk" : {
                        "Average difference between current eviction generation when the page was last considered" : 0,
                        "Average on-disk page image size seen" : 0,
                        "Average time in cache for pages that have been visited by the eviction server" : 0,
                        "Average time in cache for pages that have not been visited by the eviction server" : 0,
                        "Clean pages currently in cache" : 0,
                        "Current eviction generation" : 0,
                        "Dirty pages currently in cache" : 0,
                        "Entries in the root page" : 0,
                        "Internal pages currently in cache" : 0,
                        "Leaf pages currently in cache" : 0,
                        "Maximum difference between current eviction generation when the page was last considered" : 0,
                        "Maximum page size seen" : 0,
                        "Minimum on-disk page image size seen" : 0,
                        "Number of pages never visited by eviction server" : 0,
                        "On-disk page image sizes smaller than a single allocation unit" : 0,
                        "Pages created in memory and never written" : 0,
                        "Pages currently queued for eviction" : 0,
                        "Pages that could not be queued for eviction" : 0,
                        "Refs skipped during cache traversal" : 0,
                        "Size of the root page" : 0,
                        "Total number of pages currently in cache" : 0
                },
                "checkpoint-cleanup" : {
                        "pages added for eviction" : 0,
                        "pages removed" : 0,
                        "pages skipped during tree walk" : 0,
                        "pages visited" : 1
                },
                "compression" : {
                        "compressed page maximum internal page size prior to compression" : 4096,
                        "compressed page maximum leaf page size prior to compression " : 131072,
                        "compressed pages read" : 0,
                        "compressed pages written" : 0,
                        "page written failed to compress" : 0,
                        "page written was too small to compress" : 2
                },
                "cursor" : {
                        "bulk loaded cursor insert calls" : 0,
                        "cache cursors reuse count" : 0,
                        "close calls that result in cache" : 2,
                        "create calls" : 2,
                        "insert calls" : 1,
                        "insert key and value bytes" : 70,
                        "modify" : 0,
                        "modify key and value bytes affected" : 0,
                        "modify value bytes modified" : 0,
                        "next calls" : 1,
                        "operation restarted" : 0,
                        "prev calls" : 1,
                        "remove calls" : 0,
                        "remove key bytes removed" : 0,
                        "reserve calls" : 0,
                        "reset calls" : 5,
                        "search calls" : 0,
                        "search history store calls" : 0,
                        "search near calls" : 0,
                        "truncate calls" : 0,
                        "update calls" : 0,
                        "update key and value bytes" : 0,
                        "update value size change" : 0,
                        "Total number of entries skipped by cursor next calls" : 0,
                        "Total number of entries skipped by cursor prev calls" : 0,
                        "Total number of entries skipped to position the history store cursor" : 0,
                        "cursor next calls that skip due to a globally visible history store tombstone" : 0,
                        "cursor next calls that skip greater than or equal to 100 entries" : 0,
                        "cursor next calls that skip less than 100 entries" : 1,
                        "cursor prev calls that skip due to a globally visible history store tombstone" : 0,
                        "cursor prev calls that skip greater than or equal to 100 entries" : 0,
                        "cursor prev calls that skip less than 100 entries" : 1,
                        "open cursor count" : 0
                },
                "reconciliation" : {
                        "dictionary matches" : 0,
                        "internal page key bytes discarded using suffix compression" : 0,
                        "internal page multi-block writes" : 0,
                        "internal-page overflow keys" : 0,
                        "leaf page key bytes discarded using prefix compression" : 0,
                        "leaf page multi-block writes" : 0,
                        "leaf-page overflow keys" : 0,
                        "maximum blocks required for a page" : 1,
                        "overflow values written" : 0,
                        "page checksum matches" : 0,
                        "pages written including at least one prepare" : 0,
                        "pages written including at least one start timestamp" : 0,
                        "records written including a prepare" : 0,
                        "approximate byte size of timestamps in pages written" : 0,
                        "approximate byte size of transaction IDs in pages written" : 0,
                        "fast-path pages deleted" : 0,
                        "page reconciliation calls" : 2,
                        "page reconciliation calls for eviction" : 0,
                        "pages deleted" : 0,
                        "pages written including an aggregated newest start durable timestamp " : 0,
                        "pages written including an aggregated newest stop durable timestamp " : 0,
                        "pages written including an aggregated newest stop timestamp " : 0,
                        "pages written including an aggregated newest stop transaction ID" : 0,
                        "pages written including an aggregated newest transaction ID " : 0,
                        "pages written including an aggregated oldest start timestamp " : 0,
                        "pages written including an aggregated prepare" : 0,
                        "pages written including at least one start durable timestamp" : 0,
                        "pages written including at least one start transaction ID" : 0,
                        "pages written including at least one stop durable timestamp" : 0,
                        "pages written including at least one stop timestamp" : 0,
                        "pages written including at least one stop transaction ID" : 0,
                        "records written including a start durable timestamp" : 0,
                        "records written including a start timestamp" : 0,
                        "records written including a start transaction ID" : 0,
                        "records written including a stop durable timestamp" : 0,
                        "records written including a stop timestamp" : 0,
                        "records written including a stop transaction ID" : 0
                },
                "session" : {
                        "object compaction" : 0,
                        "tiered storage local retention time (secs)" : 0,
                        "tiered storage object size" : 0
                },
                "transaction" : {
                        "race to read prepared update retry" : 0,
                        "rollback to stable history store records with stop timestamps older than newer records" : 0,
                        "rollback to stable inconsistent checkpoint" : 0,
                        "rollback to stable keys removed" : 0,
                        "rollback to stable keys restored" : 0,
                        "rollback to stable restored tombstones from history store" : 0,
                        "rollback to stable restored updates from history store" : 0,
                        "rollback to stable sweeping history store keys" : 0,
                        "rollback to stable updates removed from history store" : 0,
                        "transaction checkpoints due to obsolete pages" : 0,
                        "update conflicts" : 0
                }
        },
        "nindexes" : 1,
        "indexBuilds" : [ ],
        "totalIndexSize" : 20480,
        "totalSize" : 40960,
        "indexSizes" : {
                "_id_" : 20480
        },
        "scaleFactor" : 1,
        "ok" : 1
}
> db.unicorns.drop()
true
> db.dropDatabase()
{ "dropped" : "learn", "ok" : 1 }
```
